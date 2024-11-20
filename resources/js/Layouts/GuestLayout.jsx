<<<<<<< HEAD

import { Link } from '@inertiajs/react';

export default function Guest({ children }) {
    return (
        <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <Link href="/">
                    <img src="image/Pii-logo.png" alt="Logo" style={{borderRadius: "15px"}} />
                </Link>
            </div>

            <div className="w-full sm:w-[80%] lg:w-[60%] mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
=======
import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
            <div>
                <Link href="/">
                    <ApplicationLogo className="h-20 w-20 fill-current text-gray-500" />
                </Link>
            </div>

            <div className="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
>>>>>>> teste
                {children}
            </div>
        </div>
    );
}
