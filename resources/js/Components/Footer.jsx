export default function Footer() {
    return (
        <footer className="bg-white text-gray-800 py-10">
            <div className="container mx-auto px-6">
                <div className="flex flex-col sm:flex-row justify-between mb-6">
                    <div className="flex items-center mb-4 sm:mb-0">
                        <img
                            src="https://via.placeholder.com/50"
                            alt="Logo"
                            className="mr-2"
                        />{" "}
                        {/* Replace with actual logo */}
                        <div>
                            <h1 className="font-bold text-lg">
                                BuildWithAngga
                            </h1>
                            <p className="text-sm">Indonesia</p>
                            <p className="text-xs">
                                Jl. K.H. Wahid Hasyim Kel. No.100
                                <br />J Jakarta, Indonesia
                            </p>
                            <p className="mt-2">+62.878.7911.9343 (WhatsApp)</p>
                        </div>
                    </div>
                    <p className="text-xs text-center sm:text-right">
                        © 2019-2024 BuildWithAngga
                    </p>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
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

                <div className="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
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

                <div>
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
