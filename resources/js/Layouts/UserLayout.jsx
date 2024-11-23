import Footer from "@/Components/Footer";
import Navbar from "@/Components/NavBar";

export default function UserLayout({ children, auth, purchasedCourses }) {
    return (
        <div className="flex flex-col min-h-screen">
            {/* Navbar */}
            <Navbar auth={auth} purchasedCourses={purchasedCourses} />

            {/* Main Content */}
            <main className="flex-grow">{children}</main>

            {/* Footer */}
            <Footer />
        </div>
    );
}
