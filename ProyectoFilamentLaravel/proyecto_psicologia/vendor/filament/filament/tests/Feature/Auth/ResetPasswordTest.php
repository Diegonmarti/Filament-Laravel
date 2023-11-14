<?php

namespace Filament\Tests\Feature\Auth;

use Filament\Filament;
use Filament\Http\Livewire\Auth\ResetPassword;
use Filament\Models\User;
use Filament\Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Livewire;

class ResetPasswordTest extends TestCase
{
    /** @test */
    public function can_reset_password()
    {
        $user = User::factory()->create();
        $newPassword = Str::random();

        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken($user),
        ])
            ->set('email', $user->email)
            ->set('password', $newPassword)
            ->set('passwordConfirmation', $newPassword)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertRedirect(route('filament.dashboard'));

        $this->assertAuthenticatedAs($user, config('filament.auth.guard'));

        $this->assertTrue(Filament::auth()->attempt([
            'email' => $user->email,
            'password' => $newPassword,
        ]));
    }

    /** @test */
    public function can_reset_password_with_custom_user_model()
    {
        Config::set('filament.auth.guard', 'web');
        Config::set('auth.providers.users.model', User::class);

        $this->can_reset_password();
    }

    /** @test */
    public function can_view_password_reset_page()
    {
        $this->get(URL::signedRoute('filament.auth.password.reset', [
            'token' => $this->generateToken(),
        ]))
            ->assertSuccessful()
            ->assertSeeLivewire('filament.core.auth.reset-password');
    }

    /** @test */
    public function email_is_required()
    {
        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken(),
        ])
            ->set('email', null)
            ->call('submit')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function email_is_valid_email()
    {
        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken(),
        ])
            ->set('email', 'invalid-email')
            ->call('submit')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function is_forbidden_if_request_is_unsigned()
    {
        $this->get(route('filament.auth.password.reset', [
            'token' => $this->generateToken(),
        ]))
            ->assertForbidden();
    }

    /** @test */
    public function password_contains_minimum_8_characters()
    {
        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken(),
        ])
            ->set('password', 'pass')
            ->call('submit')
            ->assertHasErrors(['password' => 'min']);
    }

    /** @test */
    public function password_is_confirmed()
    {
        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken(),
        ])
            ->set('passwordConfirmation', null)
            ->call('submit')
            ->assertHasErrors(['passwordConfirmation' => 'required'])
            ->set('password', 'password')
            ->set('passwordConfirmation', 'different-password')
            ->call('submit')
            ->assertHasErrors(['passwordConfirmation' => 'same']);
    }

    /** @test */
    public function password_is_required()
    {
        Livewire::test(ResetPassword::class, [
            'token' => $this->generateToken(),
        ])
            ->set('password', null)
            ->call('submit')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function shows_an_error_when_invalid_token_supplied()
    {
        $user = User::factory()->create();
        $newPassword = Str::random();

        Livewire::test(ResetPassword::class, [
            'token' => 'invalid-token',
        ])
            ->set('email', $user->email)
            ->set('password', $newPassword)
            ->set('passwordConfirmation', $newPassword)
            ->call('submit')
            ->assertHasErrors('email');
    }

    protected function generateToken($user = null)
    {
        if (! $user) {
            $user = User::factory()->create();
        }

        // Use filament_users broker only when we're using filament guard. Otherwise, use Laravel's default
        $broker = config('filament.auth.guard') === 'filament' ? 'filament_users' : null;

        return Password::broker($broker)->createToken($user);
    }
}
