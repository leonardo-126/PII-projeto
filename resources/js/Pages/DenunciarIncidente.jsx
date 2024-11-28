import TextInput from '@/Components/TextInput';
import '../../sass/pages/DenunciarIncidente.scss'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import InputLabel from '@/Components/InputLabel';
import InputError from '@/Components/InputError';
import { useForm } from '@inertiajs/react';
import GuestLayout from '@/Layouts/GuestLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { useState } from 'react';

export default function DenunciarIncidente({auth}) {
    const { data, setData, post, processing, errors, reset } = useForm({
        descricao: '',
        email: '',
        password: '',
        type: 'Policial',
        password_confirmation: '',
        telefone: '',
        cidade: '',
        estado: '',
        rua: '',
        numero: '',
        complemento: '',
        referencia: '',
        cep: ''
    });
    const submit = (e) => {
        e.preventDefault();
        
        post(route('#')); //rota a ser criada
    };
    // Dados simulados (podem vir de uma API no futuro)
    const [departamentos, setDepartamentos] = useState([
        "Financeiro",
        "RH",
        "TI",
        "Marketing",
        "Compras",
        "Financeiro",
        "RH",
        "TI",
        "Marketing",
        "Compras",
        "Financeiro",
        "RH",
        "TI",
        "Marketing",
        "Compras",
        "Financeiro",
        "RH",
        "TI",
        "Marketing",
        "Compras",
        "Financeiro",
        "RH",
        "TI",
        "Marketing",
        "Compras",
    ]); 
    // Função para buscar os dados da API
    useEffect(() => {
        fetch('/api/organizacao')
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar dados da API');
                }
                return response.json();
            })
            .then((data) => {
                 // Filtra apenas os nomes das organizações
                 const nomesOrganizacoes = data.map((org) => org.Nome_departamento);
                 setDepartamentos(nomesOrganizacoes);
            })
            .catch((error) => {
                console.error('Erro:', error);
            });
    }, []);

    const [busca, setBusca] = useState(""); // Termo de busca
    const [departamentoSelecionado, setDepartamentoSelecionado] = useState(""); // Seleção do usuário
    const [mostraLista, setMostraLista] = useState(false);
    console.log(departamentoSelecionado)

    // Filtrar os departamentos com base no termo de busca
    const opcoesFiltradas = departamentos.filter((dep) =>
        dep.toLowerCase().includes(busca.toLowerCase())
    );
    return (
        <AuthenticatedLayout
        user={auth.user}
        >
        <GuestLayout >      
            <form onSubmit={submit}>
                    <div className="flex flex-col lg:flex-row lg:gap-x-8 gap-y-6 items-start">
                        <div className="flex flex-col gap-y-4 w-full lg:w-1/2">
                            <div>
                                <InputLabel htmlFor="organizacao" value="Selecionar Organização" />
                                <div className="relative" >
                                <TextInput
                                    id="organizacao"
                                    name="organizacao"
                                    placeholder="Digite para buscar ou selecione..."
                                    value={busca}
                                    className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                    onFocus={() => setMostraLista(true)} // Mostra a lista ao focar no input
                                    onChange={(e) => setBusca(e.target.value)}
                                    required
                                />

                                {/* Dropdown com as opções */}
                                {mostraLista && (
                                    <ul
                                        className="absolute bg-white border border-gray-300 rounded-md shadow-lg mt-1 w-full max-h-40 overflow-y-auto z-10"
                                        style={{ top: "100%", left: 0 }}
                                    >
                                        {opcoesFiltradas.length > 0 ? (
                                            opcoesFiltradas.map((dep, index) => (
                                                <li
                                                    key={index}
                                                    className="px-4 py-2 cursor-pointer hover:bg-indigo-100"
                                                    onClick={() => {
                                                        setDepartamentoSelecionado(dep);
                                                        setBusca(dep); // Atualiza o campo de busca
                                                        setMostraLista(false); // Fecha a lista
                                                    }}
                                                >
                                                    {dep}
                                                </li>
                                            ))
                                        ) : (
                                            <li className="px-4 py-2 text-gray-500">
                                                Nenhum departamento encontrado.
                                            </li>
                                        )}
                                    </ul>
                                )}
                                </div>
                                <InputError message={errors.type} className="mt-2" />
                            </div>
                            <div>
                                <InputLabel htmlFor="descricao" value="Descrição" />
                                <TextInput
                                    id="descricao"
                                    name="descricao"
                                    value={data.descricao}
                                    className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                    autoComplete="descricao"
                                    isFocused={true}
                                    onChange={(e) => setData('descricao', e.target.value)}
                                    required
                                />
                                <InputError message={errors.descricao} className="mt-2" />
                            </div>

                            <div>
                                <InputLabel htmlFor="type" value="Selecionar tipo de Incidente" />
                                <select
                                    id="type"
                                    name="type"
                                    className="mt-1 block w-full h-12 px-4 py-3 text-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    value={data.type}
                                    onChange={(e) => setData('type', e.target.value)}
                                    required
                                >
                                    <option value="Policial">Policial</option>
                                    <option value="bombeiro">Bombeiro</option>
                                    <option value="Assistencia">Assistencia</option>
                                </select>
                                <InputError message={errors.type} className="mt-2" />
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
                                <InputLabel htmlFor="complemento" value="Complemento" />
                                <TextInput
                                    id="complemento"
                                    type="text"
                                    name="complemento"
                                    value={data.complemento}
                                    className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                    autoComplete="complemento"
                                    onChange={(e) => setData('complemento', e.target.value)}
                                    required
                                />
                                <InputError message={errors.complemento} className="mt-2" />
                            </div>

                            <div>
                                <InputLabel htmlFor="referencia" value="Referencia" />
                                <TextInput
                                    id="referencia"
                                    type="text"
                                    name="referencia"
                                    value={data.referencia}
                                    className="mt-1 block w-full h-12 px-4 py-3 text-lg"
                                    autoComplete="referencia"
                                    onChange={(e) => setData('referencia', e.target.value)}
                                    required
                                />
                                <InputError message={errors.referencia} className="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div className="flex items-center justify-center mt-4">
                        <PrimaryButton className="ms-4" disabled={processing}>
                            Enviar
                        </PrimaryButton>
                    </div>      
                </form>

            </GuestLayout>
        </AuthenticatedLayout>
    )
}