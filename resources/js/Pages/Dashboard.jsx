import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Denuncias from './Denuncias';

export default function Dashboard({ auth }) {
    const handleNavigate = () => {
        window.location.href = '/DenunciarIncidente'; 
    };
  
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />
            <div className="flex flex-col items-center justify-center p-12">
                <button 
                onClick={handleNavigate}
                className="
                bg-red-600
                text-white
                font-bold
                py-2
                px-4
                rounded
                hover:bg-red-700
                transition
                duration-300
                ease-in-out
                focus:outline-none
                focus:ring
                focus:ring-red-500"
                >Realizar Denuncia</button>
                <Denuncias/>
            </div>
        </AuthenticatedLayout>
    );
}
