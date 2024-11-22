import CourseList from "@/Components/CourseList";
import FAQList from "@/Components/FAQList";
import Footer from "@/Components/Footer";
import HeroSection from "@/Components/HeroSection";
import Navbar from "@/Components/NavBar";
import Testimonials from "@/Components/Testimonials";
import ChatComponent from "@/Components/ui/ChatComponent";
import { Head } from "@inertiajs/react";

// Example of purchased courses
const purchasedCourses = [
    {
        id: 1,
        title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta Pertama",
        price: 200000,
        image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
    },
];

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            <Navbar auth={auth} purchasedCourses={purchasedCourses} />
            <HeroSection />
            <Testimonials />
            <CourseList />
            <FAQList />
            <Footer />
            <ChatComponent />
        </>
    );
}
