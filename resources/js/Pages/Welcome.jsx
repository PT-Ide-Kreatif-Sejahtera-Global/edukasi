import CourseList from "@/Components/CourseList";
import FAQList from "@/Components/FAQList";
import Footer from "@/Components/Footer";
import HeroSection from "@/Components/HeroSection";
import Navbar from "@/Components/NavBar";
import Testimonials from "@/Components/Testimonials";
import { Head } from "@inertiajs/react";

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            <Navbar auth={auth} />
            <HeroSection />
            <Testimonials />
            <CourseList />
            <FAQList />
            <Footer />
        </>
    );
}
