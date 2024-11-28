import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function RegisterOrganizacao() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        type: '',
        password_confirmation: '',
        telefone: '',
        cidade: '',
        estado: '',
        rua: '',
        numero: '',
        cep: ''
    });

    const submit = (e) => {
        e.preventDefault();
        post(route('register.org.store'));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit} >
                <div className="flex flex-col lg:flex-row lg:gap-x-8 gap-y-6 items-start">
                    <div className="flex flex-col gap-y-4 w-full lg:w-1/2">
                        <div>
                            <InputLabel htmlFor="name" value="Nome da Organização" />
                            <TextInput
                                id="name"
                                name="name"
                                value={data.name}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="name"
                                isFocused={true}
                                onChange={(e) => setData('name', e.target.value)}
                                required
                            />
                            <InputError message={errors.name} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="email" value="Email" />
                            <TextInput
                                id="email"
                                type="email"
                                name="email"
                                value={data.email}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="username"
                                onChange={(e) => setData('email', e.target.value)}
                                required
                            />
                            <InputError message={errors.email} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="password" value="Senha" />
                            <TextInput
                                id="password"
                                type="password"
                                name="password"
                                value={data.password}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="password"
                                onChange={(e) => setData('password', e.target.value)}
                                required
                            />
                            <InputError message={errors.password} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="password_confirmation" value="Confirmar Senha" />
                            <TextInput
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                value={data.password_confirmation}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="new-password"
                                onChange={(e) => setData('password_confirmation', e.target.value)}
                                required
                            />
                            <InputError message={errors.password_confirmation} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="type" value="Selecionar tipo de Organização" />
                            <select
                                id="type"
                                name="type"
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                value={data.type}
                                onChange={(e) => setData('type', e.target.value)}
                                required
                            >
                                <option value={0}>Policial</option>
                                <option value={1}>Bombeiro</option>
                                <option value={2}>Assistencia</option>
                            </select>
                            <InputError message={errors.type} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="telefone" value="Telefone" />
                            <TextInput
                                id="telefone"
                                type="text"
                                name="telefone"
                                placeholder="35 997683310" 
                                value={data.telefone}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="telefone"
                                onChange={(e) => setData('telefone', e.target.value)}
                                required
                            />
                            <InputError message={errors.telefone} className="mt-2" />
                        </div>
                    </div>

                    <div className="flex flex-col gap-y-4 w-full lg:w-1/2">
                        <div>
                            <InputLabel htmlFor="cidade" value="Cidade" />
                            <TextInput
                                id="cidade"
                                type="text"
                                name="cidade"
                                value={data.cidade}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="cidade"
                                onChange={(e) => setData('cidade', e.target.value)}
                                required
                            />
                            <InputError message={errors.cidade} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="estado" value="Estado" />
                            <TextInput
                                id="estado"
                                type="text"
                                name="estado"
                                placeholder="MG" 
                                value={data.estado}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="estado"
                                onChange={(e) => setData('estado', e.target.value)}
                                required
                            />
                            <InputError message={errors.estado} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="rua" value="Rua" />
                            <TextInput
                                id="rua"
                                type="text"
                                name="rua"
                                value={data.rua}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="rua"
                                onChange={(e) => setData('rua', e.target.value)}
                                required
                            />
                            <InputError message={errors.rua} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="numero" value="Numero" />
                            <TextInput
                                id="numero"
                                type="text"
                                name="numero"
                                value={data.numero}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="numero"
                                onChange={(e) => setData('numero', e.target.value)}
                                required
                            />
                            <InputError message={errors.numero} className="mt-2" />
                        </div>

                        <div>
                            <InputLabel htmlFor="cep" value="Cep" />
                            <TextInput
                                id="cep"
                                type="text"
                                name="cep"
                                value={data.cep}
                                className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                autoComplete="cep"
                                onChange={(e) => setData('cep', e.target.value)}
                                required
                            />
                            <InputError message={errors.cep} className="mt-2" />
                        </div>
                    </div>
                </div>

                <div className="flex items-center justify-end mt-6">
                    <Link
                        href={route('login')}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Já cadastrado?
                    </Link>

                    <PrimaryButton className="ms-4" disabled={processing}>
                        Registrar
                    </PrimaryButton>
                </div>
            </form>

        </GuestLayout>
    );
}
