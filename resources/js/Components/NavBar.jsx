import { useState, useRef } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { Link } from "@inertiajs/react";

library.add(fas);

export default function Navbar({ auth }) {
    const [isDropdownOpen, setDropdownOpen] = useState(false);
    const [isSubDropdownOpen, setSubDropdownOpen] = useState(false);
    const dropdownRef = useRef(null);
    const kategoriRef = useRef(null);

    const handleMouseEnterDropdown = () => {
        setDropdownOpen(true);
    };

    const handleMouseLeaveDropdown = () => {
        setDropdownOpen(false);
        setSubDropdownOpen(false);
    };

    const handleMouseEnterSubDropdown = () => {
        setSubDropdownOpen(true);
    };

    const handleMouseLeaveSubDropdown = () => {
        setSubDropdownOpen(false);
    };

    return (
        <div>
            <nav className="bg-white shadow-lg">
                <div className="container mx-auto px-6 flex justify-between items-center">
                    {/* Logo */}
                    <div className="flex items-center">
                        <img
                            src="/admin/images/logos/IdeaThings.png"
                            alt="Logo"
                            className="ml-4 lg:ml-12 h-16 w-auto"
                        />
                    </div>

                    {/* Kategori with dropdown trigger */}
                    <div
                        className="relative ml-4 h-[96px]"
                        ref={kategoriRef}
                        onMouseEnter={handleMouseEnterDropdown}
                        onMouseLeave={handleMouseLeaveDropdown}
                    >
                        <button className="w-full h-full cursor-pointer hidden lg:block text-left">
                            <p>Kategori</p>
                        </button>

                        {/* Main Dropdown Menu */}
                        {isDropdownOpen && (
                            <div
                                ref={dropdownRef}
                                className="absolute left-1/2 transform -translate-x-1/2 z-40 mt-0 w-40 h-auto bg-white border shadow-lg"
                            >
                                <Link
                                    href="/kategori/kategori1"
                                    className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                    onClick={handleMouseLeaveDropdown}
                                >
                                    Kategori 1
                                </Link>
                                <Link
                                    href="/kategori/kategori2"
                                    className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                    onClick={handleMouseLeaveDropdown}
                                >
                                    Kategori 2
                                </Link>

                                {/* Kategori 3 with subcategories */}
                                <div
                                    className="relative"
                                    onMouseEnter={handleMouseEnterSubDropdown}
                                    onMouseLeave={handleMouseLeaveSubDropdown}
                                >
                                    <p className="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-lime-100">
                                        Kategori 3
                                    </p>

                                    {/* Sub Dropdown Menu */}
                                    {isSubDropdownOpen && (
                                        <div className="absolute left-full top-0 mt-0 ml-0 w-40 bg-white border shadow-lg">
                                            <Link
                                                href="/kategori/kategori3/subkategori1"
                                                className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                                onClick={
                                                    handleMouseLeaveDropdown
                                                }
                                            >
                                                Subkategori 1
                                            </Link>
                                            <Link
                                                href="/kategori/kategori3/subkategori2"
                                                className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                                onClick={
                                                    handleMouseLeaveDropdown
                                                }
                                            >
                                                Subkategori 2
                                            </Link>
                                        </div>
                                    )}
                                </div>

                                <Link
                                    href="/kategori/kategori4"
                                    className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                    onClick={handleMouseLeaveDropdown}
                                >
                                    Kategori 4
                                </Link>
                            </div>
                        )}
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
                        <p>Pembelajaran Saya</p>
                    </div>

                    <div className="ml-4">
                        <FontAwesomeIcon
                            className="h-6 w-6 text-lime-500 hidden md:block"
                            icon={["fas", "shopping-cart"]}
                        />
                    </div>

                    {/* Buttons */}
                    <div className="ml-4 space-x-4">
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
                    </div>
                </div>
            </nav>
        </div>
    );
}
