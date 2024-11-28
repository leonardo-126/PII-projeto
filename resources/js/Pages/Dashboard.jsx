import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import Denuncias from './Denuncias';

<<<<<<< HEAD
<<<<<<< HEAD
export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
=======
export default function Dashboard() {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            }
>>>>>>> teste
        >
            <Head title="Dashboard" />

            <div className="py-12">
<<<<<<< HEAD
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">You're logged in!</div>
=======
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            You're logged in!
                        </div>
>>>>>>> teste
                    </div>
                </div>
=======
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
>>>>>>> teste
            </div>
        </AuthenticatedLayout>
    );
}
