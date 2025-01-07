import { useRef, useState } from "react";
import CourseCard from "./ui/CourseCard";

export default function CourseList({ courses }) {
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
                Pilihan Kursus Yang Banyak
            </h2>
            <p className="text-left text-gray-700 mb-6">
                Kami Menyediakan Ribuan Kursus Yang Dapat Menunjang Kemandirian
                Anda
            </p>
            <div
                ref={scrollRef}
                onMouseDown={handleMouseDown} // Handle mouse down event
                style={{ cursor: "grab" }}
                className="grid grid-flow-col scrollbar-hidden overflow-auto gap-6"
            >
                {courses.map((course, index) => (
                    <CourseCard
                        key={index}
                        title={course.title}
                        price={course.price}
                        image={`/storage/course/${course.foto}`} // Adjust the image path as necessary
                    />
                ))}
            </div>
            <div className="flex justify-center mt-8">
                <button className="flex items-center justify-center px-4 py-2 bg-lime-500 text-white rounded hover:bg-lime-600">
                    Tampilkan Lebih Banyak Kursus
                </button>
            </div>
        </div>
    );
}
