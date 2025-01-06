import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import Logo from "./ui/Logo";
import CategoryDropdown from "./ui/CategoryDropdown";
import SearchBar from "./ui/SearchBar";
import CartDropdown from "./ui/CartDropdown";
import AuthButtons from "./ui/AuthButtons";
import LearningDropdown from "./ui/LearningDropdown";
import { useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

library.add(fas);

export default function UserNavbar({ auth, purchasedCourses }) {
    const [isMobileMenuOpen, setMobileMenuOpen] = useState(false);

    const toggleMobileMenu = () => {
        setMobileMenuOpen(!isMobileMenuOpen);
    };

    return (
        <nav className="bg-white shadow-lg sticky top-0 z-50">
            <div className="container mx-auto px-6 h-[96px] flex justify-between items-center">
                {/* Logo */}
                <Logo />

                {/* Mobile Menu Button */}
                <button
                    className="md:hidden p-2 text-gray-600 focus:outline-none"
                    onClick={toggleMobileMenu}
                >
                    <FontAwesomeIcon
                        icon={isMobileMenuOpen ? "times" : "bars"}
                    />
                </button>

                {/* Kategori with dropdown trigger */}
                <CategoryDropdown />

                {/* Search Bar */}
                <SearchBar />

                <LearningDropdown purchasedCourses={purchasedCourses} />

                {/* Cart Icon */}
                <CartDropdown purchasedCourses={purchasedCourses} />

                {/* Buttons */}
                <AuthButtons auth={auth} />
            </div>

            {/* Mobile Menu */}
            {isMobileMenuOpen && (
                <div className="md:hidden bg-white shadow-md">
                    <div className="flex flex-col items-center space-y-2 py-4">
                        <CategoryDropdown />
                        <SearchBar />
                        <LearningDropdown purchasedCourses={purchasedCourses} />
                        <CartDropdown purchasedCourses={purchasedCourses} />
                        <AuthButtons auth={auth} />
                    </div>
                </div>
            )}
        </nav>
    );
}
