import { Link } from "@inertiajs/react";
import { useState } from "react";

export default function AuthButtons({ auth }) {
    const [dropdownOpen, setDropdownOpen] = useState(false);

    const toggleDropdown = () => {
        setDropdownOpen(!dropdownOpen);
    };

    return (
        <div className="ml-4 space-x-4 relative">
            {auth.user ? (
                <div className="relative">
                    <button
                        onClick={toggleDropdown}
                        className="flex items-center bg-white text-gray-700 font-bold py-2 px-4 rounded"
                    >
                        <img
                            alt=""
                            src={`/storage/users/${auth.user.foto}`}
                            className="h-8 w-8 mr-2 rounded-full bg-gray-50"
                        />
                        <span aria-hidden="true">{auth.user.name}</span>
                    </button>
                    {dropdownOpen && (
                        <div className="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
                            <Link
                                href="/profile"
                                className="block px-4 py-2 text-gray-800 hover:bg-lime-100"
                            >
                                Profile
                            </Link>
                            <Link
                                href="/logout"
                                method="post" // Assuming you want to send a POST request to log out
                                className="block px-4 py-2 text-gray-800 hover:bg-lime-100"
                            >
                                Logout
                            </Link>
                        </div>
                    )}
                </div>
            ) : (
                <>
                    <Link
                        href="/register"
                        className="bg-white hover:bg-lime-400 ring-lime-300 text-lime-400 hover:text-white ring-1 ring-inset font-bold py-2 px-4 rounded"
                    >
                        Sign Up
                    </Link>
                    <Link
                        href="/login"
                        className="bg-lime-500 hover:bg-lime-600 text-white font-bold py-2 px-4 rounded"
                    >
                        Sign In
                    </Link>
                </>
            )}
        </div>
    );
}
