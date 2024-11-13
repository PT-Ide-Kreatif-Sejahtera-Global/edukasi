import { useRef } from "react";
import CourseCard from "./ui/CourseCard";

export default function CourseList() {
    const courses = [
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta Pertama",
            description:
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            totalRating: 200,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            totalRating: 50,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            totalRating: 35,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Upwork Freelancer Mastery: Strategi Terbaik 100 Juta",
            totalRating: 40,
            price: 200000,
            image: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
    ];

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
                        totalRating={course.totalRating}
                        image={course.image}
                    />
                ))}
            </div>
        </div>
    );
}
