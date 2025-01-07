export default function Footer() {
    return (
        <footer className="bg-lime-500 text-white py-10">
            <div className="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
                {/* Company Logo and Info */}
                <div className="flex flex-col mb-6">
                    <img
                        src="/admin/images/logos/IdeaThings.png" // Replace with actual logo
                        alt="Logo"
                        className="mr-2 mb-4 h-16 w-16"
                    />
                    <h1 className="font-bold text-lg mb-2">IdeaThings</h1>
                    <p className="text-md">
                        Jl. Suryopranoto No.11 F, RT.008/008, Kel.Petojo
                        Selatan, Kec.Gambir, Jakarta Pusat, DKI Jakarta, 10160,
                        Desa/Kelurahan Petojo Selatan, Kec. Gambir, Kota Adm.
                        Jakarta Pusat, Provinsi DKI Jakarta,
                        <br />
                        Jakarta, Indonesia
                    </p>
                    <p className="text-md">
                        © {new Date().getFullYear()} IdeaThings
                    </p>
                </div>

                {/* Links Section 1 */}
                {/* <div className="flex flex-col justify-center mb-6">
                    <h2 className="font-semibold text-lg">
                        Start Popular Career
                    </h2>
                    <ul className="mt-2">
                        <li>UI/UX Designer</li>
                        <li>Web Developer</li>
                        <li>Mobile Developer</li>
                        <li>Data Scientist</li>
                        <li>Digital Marketer</li>
                    </ul>
                </div> */}
            </div>
        </footer>
    );
}
