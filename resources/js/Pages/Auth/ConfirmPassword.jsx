<<<<<<< HEAD
import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
=======
>>>>>>> teste
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
<<<<<<< HEAD
=======
import GuestLayout from '@/Layouts/GuestLayout';
>>>>>>> teste
import { Head, useForm } from '@inertiajs/react';

export default function ConfirmPassword() {
    const { data, setData, post, processing, errors, reset } = useForm({
        password: '',
    });

<<<<<<< HEAD
    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('password.confirm'));
=======
    const submit = (e) => {
        e.preventDefault();

        post(route('password.confirm'), {
            onFinish: () => reset('password'),
        });
>>>>>>> teste
    };

    return (
        <GuestLayout>
            <Head title="Confirm Password" />

            <div className="mb-4 text-sm text-gray-600">
<<<<<<< HEAD
                This is a secure area of the application. Please confirm your password before continuing.
=======
                This is a secure area of the application. Please confirm your
                password before continuing.
>>>>>>> teste
            </div>

            <form onSubmit={submit}>
                <div className="mt-4">
                    <InputLabel htmlFor="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="mt-1 block w-full"
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="mt-2" />
                </div>

<<<<<<< HEAD
                <div className="flex items-center justify-end mt-4">
=======
                <div className="mt-4 flex items-center justify-end">
>>>>>>> teste
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Confirm
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}
