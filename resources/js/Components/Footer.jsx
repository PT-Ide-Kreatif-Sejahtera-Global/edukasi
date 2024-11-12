// Footer.js
export default function Footer() {
    return (
        <footer className="bg-white text-gray-800 py-10">
            <div className="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {/* Company Logo and Info */}
                <div className="flex flex-col mb-6">
                    <img
                        src="/admin/images/logos/IdeaThings.png" // Replace with actual logo
                        alt="Logo"
                        className="mr-2 mb-4 h-16 w-16"
                    />
                    <h1 className="font-bold text-lg mb-2">IdeaThings</h1>
                    <p className="text-md">Jakarta, Indonesia</p>
                    <p className="text-md">
                        Jl. K.H. Wahid Hasyim Kel. No.100
                        <br />
                        Jakarta, Indonesia
                    </p>
                    <p className="mt-2 text-md">089699501548 (WhatsApp)</p>
                    <p className="text-md">© 2019-2024 IdeaThings</p>
                </div>

                {/* Links Section 1 */}
                <div className="grid grid-cols-1 gap-6 mb-6 sm:col-span-2 lg:col-span-1">
                    <div>
                        <h2 className="font-semibold">Start Popular Career</h2>
                        <ul className="mt-2">
                            <li>UI/UX Designer</li>
                            <li>Web Developer</li>
                            <li>Mobile Developer</li>
                            <li>Data Scientist</li>
                            <li>Digital Marketer</li>
                        </ul>
                    </div>
                    <div>
                        <h2 className="font-semibold">Mastering Hot Tools</h2>
                        <ul className="mt-2">
                            <li>Figma</li>
                            <li>Flutter</li>
                            <li>React JS</li>
                            <li>Vue JS</li>
                        </ul>
                    </div>
                    <div>
                        <h2 className="font-semibold">Learn Language</h2>
                        <ul className="mt-2">
                            <li>PHP</li>
                            <li>JavaScript</li>
                            <li>Python</li>
                            <li>HTML & CSS</li>
                            <li>Kotlin</li>
                        </ul>
                    </div>
                </div>

                {/* Links Section 2 */}
                <div className="grid grid-cols-1 gap-6 mb-6 sm:col-span-2 lg:col-span-1">
                    <div>
                        <h2 className="font-semibold">Resources</h2>
                        <ul className="mt-2">
                            <li>Karin Handbook</li>
                            <li>Karir Sendiri</li>
                            <li>Tips Mentor</li>
                        </ul>
                    </div>
                    <div>
                        <h2 className="font-semibold">Community</h2>
                        <ul className="mt-2">
                            <li>Showcase</li>
                            <li>Testimonials</li>
                        </ul>
                    </div>
                    <div>
                        <h2 className="font-semibold">Company</h2>
                        <ul className="mt-2">
                            <li>About</li>
                            <li>Contact</li>
                            <li>YouTube</li>
                            <li>Instagram</li>
                        </ul>
                    </div>
                </div>

                {/* Useful Links Section */}
                <div className="mb-6 sm:col-span-2 lg:col-span-1">
                    <h2 className="font-semibold">Useful Links</h2>
                    <ul className="mt-2">
                        <li>Privacy & Policy</li>
                        <li>Terms & Conditions</li>
                        <li>Roadmap Belajar</li>
                        <li>All Certificates</li>
                    </ul>
                </div>
            </div>
        </footer>
    );
}
