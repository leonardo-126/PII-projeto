
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
                {children}
            </div>
        </div>
    );
}
