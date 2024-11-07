import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

library.add(fas);
import { Link } from "@inertiajs/react";

const Navbar = ({ auth }) => {
    return (
        <nav className="bg-white shadow-lg">
            <div className="container mx-auto px-6 py-4 flex justify-between items-center">
                {/* Logo */}
                <div className="flex items-center">
                    <img
                        src="/admin/images/logos/IdeaThings.png"
                        alt="Logo"
                        className="ml-4 lg:ml-12 h-16 w-auto"
                    />
                </div>

                <div className="ml-4">
                    <p className="hidden lg:block">Kategori</p>
                </div>

                {/* Search Bar */}
                <div className="relative sm:w-60 md:w-96 lg:w-[500px] hidden sm:block px-3 py-2">
                    <span className="absolute inset-y-0 left-0 flex items-center pl-3">
                        <FontAwesomeIcon
                            icon={["fas", "search"]}
                            className="px-4 text-gray-400"
                        />
                    </span>
                    <input
                        type="text"
                        className="block w-full pl-10 rounded-full border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                        placeholder="Cari Kursus Anda Disini"
                    />
                </div>

                {/* Cart Icon */}
                <div className="ml-4">
                    <FontAwesomeIcon
                        className="h-8 w-8 text-lime-500 hidden md:block"
                        icon={["fas", "shopping-cart"]}
                    />
                </div>

                {/* Book Icon */}
                <div className="ml-4">
                    <FontAwesomeIcon
                        className="h-8 w-8 text-lime-500 hidden md:block"
                        icon={["fas", "book"]}
                    />
                </div>

                {/* Buttons */}
                <div className="ml-4 space-x-4">
                    <button className="bg-white hover:bg-lime-400 ring-lime-300 text-lime-400 hover:text-white ring-1 ring-inset font-bold py-2 px-4 rounded">
                        Sign Up
                    </button>
                    <button className="bg-lime-500 hover:bg-lime-600 text-white font-bold py-2 px-4 rounded">
                        Sign In
                    </button>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
