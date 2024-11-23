import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import Logo from "./ui/Logo";
import CategoryDropdown from "./ui/CategoryDropdown";
import SearchBar from "./ui/SearchBar";
import CartDropdown from "./ui/CartDropdown";
import AuthButtons from "./ui/AuthButtons";
import LearningDropdown from "./ui/LearningDropdown";

library.add(fas);

export default function Navbar({ auth, purchasedCourses }) {
    return (
        <div>
            <nav className="bg-white shadow-lg">
                <div className="container mx-auto px-6 h-[96px] flex justify-between items-center">
                    {/* Logo */}
                    <Logo />

                    {/* Kategori with dropdown trigger */}
                    <CategoryDropdown />

                    {/* Search Bar */}
                    <SearchBar />

                    <LearningDropdown purchasedCourses={purchasedCourses} />

                    {/* Cart Icon */}
                    <CartDropdown purchasedCourses={purchasedCourses} />

                    {/* Buttons */}
                    <AuthButtons />
                </div>
            </nav>
        </div>
    );
}
