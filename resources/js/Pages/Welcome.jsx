import HeroSection from "@/Components/HeroSection";
import Navbar from "@/Components/NavBar";
import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            <Navbar auth={auth} />
            <HeroSection />
        </>
    );
}
