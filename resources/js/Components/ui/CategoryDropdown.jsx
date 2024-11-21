import { useState, useRef } from "react";
import { Link } from "@inertiajs/react";

export default function CategoryDropdown() {
    const [isDropdownOpen, setDropdownOpen] = useState(false);
    const [isSubDropdownOpen, setSubDropdownOpen] = useState(false);
    const dropdownRef = useRef(null);

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
        <div
            className="relative ml-4"
            onMouseEnter={handleMouseEnterDropdown}
            onMouseLeave={handleMouseLeaveDropdown}
        >
            <button className="w-full h-full cursor-pointer hidden lg:block text-left">
                <p>Kategori</p>
            </button>

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

                    <div
                        className="relative"
                        onMouseEnter={handleMouseEnterSubDropdown}
                        onMouseLeave={handleMouseLeaveSubDropdown}
                    >
                        <p className="block px-4 py-2 text-sm text-gray-700 cursor-pointer hover:bg-lime-100">
                            Kategori 3
                        </p>

                        {isSubDropdownOpen && (
                            <div className="absolute left-full top-0 mt-0 ml-0 w-40 bg-white border shadow-lg">
                                <Link
                                    href="/kategori/kategori3/subkategori1"
                                    className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                    onClick={handleMouseLeaveDropdown}
                                >
                                    Subkategori 1
                                </Link>
                                <Link
                                    href="/kategori/kategori3/subkategori2"
                                    className="block px-4 py-2 text-sm text-gray-700 hover:bg-lime-100"
                                    onClick={handleMouseLeaveDropdown}
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
    );
}
