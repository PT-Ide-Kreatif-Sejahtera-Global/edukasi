import { Link } from "@inertiajs/react";

const Navbar = ({ auth }) => {
    return (
        <nav className="bg-white">
            <div className="container mx-auto px-6 py-4 flex justify-between items-center">
                {/* Logo */}
                <div className="flex items-center">
                    <img
                        src="/admin/images/logos/IdeaThings.png"
                        alt="Logo"
                        className="h-12 w-auto"
                    />{" "}
                    {/* Replace with your logo path */}
                </div>

                {/* <ul className="flex space-x-6">
                    <li>
                        <Link
                            href="#top"
                            className="text-white hover:text-gray-300"
                        >
                            Home
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="#about"
                            className="text-white hover:text-gray-300"
                        >
                            About
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="#team"
                            className="text-white hover:text-gray-300"
                        >
                            Our Teacher
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="#courses"
                            className="text-white hover:text-gray-300"
                        >
                            Courses
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="#testimonial"
                            className="text-white hover:text-gray-300"
                        >
                            Reviews
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="#contact"
                            className="text-white hover:text-gray-300"
                        >
                            Contact
                        </Link>
                    </li>
                    {auth ? (
                        <>
                            <li>
                                <Link
                                    href="/profile"
                                    className="text-white hover:text-gray-300"
                                >
                                    Profile
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/logout"
                                    className="text-white hover:text-gray-300"
                                >
                                    Logout
                                </Link>
                            </li>
                        </>
                    ) : (
                        <li>
                            <Link
                                href="/login"
                                className="text-white hover:text-gray-300"
                            >
                                Login/Register
                            </Link>
                        </li>
                    )}
                </ul> */}

                {/* Search Bar */}
                <div className="w-96 px-3 py-2">
                    <input
                        type="text"
                        className="block w-full rounded-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                        placeholder="Search Courses"
                    />
                </div>

                {/* Cart Icon */}
                <div className="ml-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="h-6 w-6 text-green-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        {/* Your cart icon SVG here */}
                    </svg>
                </div>

                {/* Buttons */}
                <div className="ml-4 space-x-4">
                    <button className="bg-green-300 hover:bg-green-400 text-white font-bold py-2 px-4 rounded">
                        Sign Up
                    </button>
                    <button className="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Sign In
                    </button>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
