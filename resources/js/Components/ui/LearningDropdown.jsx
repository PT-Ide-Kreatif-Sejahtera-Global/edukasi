import { useState } from "react";
import { Link } from "@inertiajs/react";

export default function LearningDropdown({ purchasedCourses }) {
    const [isDropdownOpen, setDropdownOpen] = useState(false);

    const handleMouseEnterDropdown = () => {
        setDropdownOpen(true);
    };

    const handleMouseLeaveDropdown = () => {
        setDropdownOpen(false);
    };

    return (
        <div
            className="relative ml-4 h-full"
            onMouseEnter={handleMouseEnterDropdown}
            onMouseLeave={handleMouseLeaveDropdown}
        >
            <p className="cursor-pointer">Pembelajaran Saya</p>

            {isDropdownOpen && (
                <div className="absolute right-0 z-40 mt-2 w-64 bg-white border shadow-lg">
                    {purchasedCourses.length > 0 ? (
                        purchasedCourses.map((course, index) => (
                            <div
                                key={index}
                                className="flex items-start p-2 hover:bg-lime-100"
                            >
                                <img
                                    src={course.image}
                                    alt={course.title}
                                    className="h-16 w-16 object-cover rounded mr-2"
                                />
                                <div className="flex-1">
                                    <Link
                                        href={`/courses/${course.id}`} // Adjust the link as necessary
                                        className="block text-sm font-semibold text-gray-700 hover:underline"
                                        onClick={handleMouseLeaveDropdown}
                                    >
                                        {course.title}
                                    </Link>
                                    <p className="text-xs text-gray-500">
                                        {course.description}
                                    </p>
                                    <p className="text-xs text-gray-600">
                                        Rating: {course.totalRating}
                                    </p>
                                    <p className="text-xs text-gray-600">
                                        Price: Rp{" "}
                                        {course.price.toLocaleString()}
                                    </p>
                                </div>
                            </div>
                        ))
                    ) : (
                        <span className="block px-4 py-2 text-sm text-gray-700">
                            No courses purchased
                        </span>
                    )}
                </div>
            )}
        </div>
    );
}
