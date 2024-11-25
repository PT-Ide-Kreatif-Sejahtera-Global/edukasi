import Footer from "@/Components/Footer";
import UserNavbar from "@/Components/UserNavBar";

export default function UserLayout({ children, auth, purchasedCourses }) {
    return (
        <div className="flex flex-col min-h-screen">
            {/* Navbar */}
            <UserNavbar auth={auth} purchasedCourses={purchasedCourses} />

            {/* Main Content */}
            <main className="flex-grow">{children}</main>

            {/* Footer */}
            <Footer />
        </div>
    );
}
