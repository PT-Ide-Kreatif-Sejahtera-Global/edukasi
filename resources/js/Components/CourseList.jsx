import { useState } from "react";
import CategoryListSelect from "./ui/CategoryListSelect";
import CourseCard from "./ui/CourseCard";

const CourseList = () => {
    const [selectedCategory, setSelectedCategory] = useState(1);
    // Sample data for courses
    const courses = [
        {
            title: "Judul Kursus A",
            description:
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            rating: 4.5,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Judul Kursus B",
            description:
                "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
            rating: 5.0,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Judul Kursus C",
            description:
                "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.",
            rating: 3.5,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Judul Kursus D",
            description:
                "Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.",
            rating: 4.0,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Judul Kursus E",
            description:
                "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.",
            rating: 4.8,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
        {
            title: "Judul Kursus F",
            description:
                "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.",
            rating: 5.0,
            imageUrl: "/landing/images/slider-image1.jpg", // Replace with actual image URL
        },
    ];

    return (
        <div className="py-10">
            <h2 className="text-center text-2xl font-semibold mb-6">
                Pilihan Kursus Yang Banyak
            </h2>
            <p className="text-center text-gray-700 mb-6">
                Kami Menyediakan Ribuan Kursus Yang Dapat Menunjang Kemandirian
                Anda
            </p>
            <CategoryListSelect
                selectedCategory={selectedCategory}
                onSelectCategory={setSelectedCategory}
            />
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {courses.map((course, index) => (
                    <CourseCard
                        key={index}
                        title={course.title}
                        description={course.description}
                        rating={course.rating}
                        imageUrl={course.imageUrl}
                    />
                ))}
            </div>
            <div className="flex justify-center mt-10">
                <button className="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-400">
                    <span className="mr-2">View All Courses</span>
                    <i className="fas fa-play"></i>{" "}
                    {/* You can include FontAwesome for icons */}
                </button>
            </div>
        </div>
    );
};

export default CourseList;
