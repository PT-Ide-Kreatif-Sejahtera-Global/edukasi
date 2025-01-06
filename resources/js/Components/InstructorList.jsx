import { useRef } from "react";
import InstructorCard from "./ui/InstructorCard";
import { Link } from "@inertiajs/react";

export default function InstructorList({ instructors }) {
    const scrollRef = useRef(null); // Creating a reference to the scrollable div

    // Mouse dragging logic
    const handleMouseDown = (event) => {
        const startX = event.pageX - scrollRef.current.offsetLeft;
        const scrollLeft = scrollRef.current.scrollLeft;

        const handleMouseMove = (moveEvent) => {
            const x = moveEvent.pageX - scrollRef.current.offsetLeft;
            const walk = (x - startX) * 2; // The multiplier controls the dragging speed
            scrollRef.current.scrollLeft = scrollLeft - walk;
        };

        const handleMouseUp = () => {
            scrollRef.current.removeEventListener("mousemove", handleMouseMove);
            scrollRef.current.removeEventListener("mouseup", handleMouseUp);
            scrollRef.current.removeEventListener("mouseleave", handleMouseUp);
        };

        scrollRef.current.addEventListener("mousemove", handleMouseMove);
        scrollRef.current.addEventListener("mouseup", handleMouseUp);
        scrollRef.current.addEventListener("mouseleave", handleMouseUp);
    };

    return (
        <div className="p-10 mb-12">
            <h2 className="text-left text-2xl font-semibold mb-6">
                Instruktur Terbaik di Indonesia
            </h2>
            <p className="text-left text-gray-700 mb-6">
                Kursus Kami Dibuat Oleh Pakar Kursus Terbaik, Sehingga Anda Akan
                Merasa Nyaman Belajar Disini
            </p>
            <div
                ref={scrollRef}
                onMouseDown={handleMouseDown} // Handle mouse down event
                style={{ cursor: "grab" }}
                className="grid grid-flow-col scrollbar-hidden overflow-auto gap-6"
            >
                {instructors.map((instructor, index) => (
                    <InstructorCard
                        key={index}
                        name={instructor.name}
                        bio={instructor.bio}
                        image={`/storage/users/${instructor.foto}`} // Adjust the image path as necessary
                    />
                ))}
            </div>
            <div className="flex justify-center mt-8">
                <Link
                    href={route("showinstructor")}
                    className="flex items-center justify-center px-4 py-2 bg-lime-500 text-white rounded hover:bg-lime-600"
                >
                    Tampilkan Lebih Banyak Instruktur
                </Link>
            </div>
        </div>
    );
}
