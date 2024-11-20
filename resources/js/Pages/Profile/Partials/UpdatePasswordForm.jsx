<<<<<<< HEAD
import { useRef } from 'react';
=======
>>>>>>> teste
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
<<<<<<< HEAD
import { useForm } from '@inertiajs/react';
import { Transition } from '@headlessui/react';
=======
import { Transition } from '@headlessui/react';
import { useForm } from '@inertiajs/react';
import { useRef } from 'react';
>>>>>>> teste

export default function UpdatePasswordForm({ className = '' }) {
    const passwordInput = useRef();
    const currentPasswordInput = useRef();

<<<<<<< HEAD
    const { data, setData, errors, put, reset, processing, recentlySuccessful } = useForm({
=======
    const {
        data,
        setData,
        errors,
        put,
        reset,
        processing,
        recentlySuccessful,
    } = useForm({
>>>>>>> teste
        current_password: '',
        password: '',
        password_confirmation: '',
    });

    const updatePassword = (e) => {
        e.preventDefault();

        put(route('password.update'), {
            preserveScroll: true,
            onSuccess: () => reset(),
            onError: (errors) => {
                if (errors.password) {
                    reset('password', 'password_confirmation');
                    passwordInput.current.focus();
                }

                if (errors.current_password) {
                    reset('current_password');
                    currentPasswordInput.current.focus();
                }
            },
        });
    };

    return (
        <section className={className}>
            <header>
<<<<<<< HEAD
                <h2 className="text-lg font-medium text-gray-900">Update Password</h2>

                <p className="mt-1 text-sm text-gray-600">
                    Ensure your account is using a long, random password to stay secure.
=======
                <h2 className="text-lg font-medium text-gray-900">
                    Update Password
                </h2>

                <p className="mt-1 text-sm text-gray-600">
                    Ensure your account is using a long, random password to stay
                    secure.
>>>>>>> teste
                </p>
            </header>

            <form onSubmit={updatePassword} className="mt-6 space-y-6">
                <div>
<<<<<<< HEAD
                    <InputLabel htmlFor="current_password" value="Current Password" />
=======
                    <InputLabel
                        htmlFor="current_password"
                        value="Current Password"
                    />
>>>>>>> teste

                    <TextInput
                        id="current_password"
                        ref={currentPasswordInput}
                        value={data.current_password}
<<<<<<< HEAD
                        onChange={(e) => setData('current_password', e.target.value)}
=======
                        onChange={(e) =>
                            setData('current_password', e.target.value)
                        }
>>>>>>> teste
                        type="password"
                        className="mt-1 block w-full"
                        autoComplete="current-password"
                    />

<<<<<<< HEAD
                    <InputError message={errors.current_password} className="mt-2" />
=======
                    <InputError
                        message={errors.current_password}
                        className="mt-2"
                    />
>>>>>>> teste
                </div>

                <div>
                    <InputLabel htmlFor="password" value="New Password" />

                    <TextInput
                        id="password"
                        ref={passwordInput}
                        value={data.password}
                        onChange={(e) => setData('password', e.target.value)}
                        type="password"
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

                <div>
<<<<<<< HEAD
                    <InputLabel htmlFor="password_confirmation" value="Confirm Password" />
=======
                    <InputLabel
                        htmlFor="password_confirmation"
                        value="Confirm Password"
                    />
>>>>>>> teste

                    <TextInput
                        id="password_confirmation"
                        value={data.password_confirmation}
<<<<<<< HEAD
                        onChange={(e) => setData('password_confirmation', e.target.value)}
=======
                        onChange={(e) =>
                            setData('password_confirmation', e.target.value)
                        }
>>>>>>> teste
                        type="password"
                        className="mt-1 block w-full"
                        autoComplete="new-password"
                    />

<<<<<<< HEAD
                    <InputError message={errors.password_confirmation} className="mt-2" />
=======
                    <InputError
                        message={errors.password_confirmation}
                        className="mt-2"
                    />
>>>>>>> teste
                </div>

                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Save</PrimaryButton>

                    <Transition
                        show={recentlySuccessful}
                        enter="transition ease-in-out"
                        enterFrom="opacity-0"
                        leave="transition ease-in-out"
                        leaveTo="opacity-0"
                    >
<<<<<<< HEAD
                        <p className="text-sm text-gray-600">Saved.</p>
=======
                        <p className="text-sm text-gray-600">
                            Saved.
                        </p>
>>>>>>> teste
                    </Transition>
                </div>
            </form>
        </section>
    );
}
