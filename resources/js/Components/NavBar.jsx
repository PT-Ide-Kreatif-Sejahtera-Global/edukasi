import { useState, useRef } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { Link } from "@inertiajs/react";
import Logo from "./ui/Logo";
import CategoryDropdown from "./ui/CategoryDropdown";
import SearchBar from "./ui/SearchBar";
import CartDropdown from "./ui/CartDropdown";
import AuthButtons from "./ui/AuthButtons";

// Example of purchased courses
const purchasedCourses = [
    {
        id: 1,
        title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta Pertama",
        description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        totalRating: 200,
        price: 200000,
        image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
    },
    {
        id: 2,
        title: "React for Beginners",
        description: "Learn the basics of React.",
        totalRating: 150,
        price: 150000,
        image: "/landing/images/react-course.jpg", // Replace with actual image URL
    },
    {
        id: 3,
        title: "Advanced JavaScript",
        description: "Deep dive into JavaScript.",
        totalRating: 300,
        price: 250000,
        image: "/landing/images/javascript-course.jpg", // Replace with actual image URL
    },
];

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

                    <div className="ml-4">
                        <p>Pembelajaran Saya</p>
                    </div>

                    {/* Cart Icon */}
                    <CartDropdown purchasedCourses={purchasedCourses} />

                    {/* Buttons */}
                    <AuthButtons />
                </div>
            </nav>
        </div>
    );
}
