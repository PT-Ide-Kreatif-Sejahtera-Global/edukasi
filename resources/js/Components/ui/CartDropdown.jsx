import { useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Link } from "@inertiajs/react";

export default function CartDropdown({ purchasedCourses }) {
    const [isCoursesDropdownOpen, setCoursesDropdownOpen] = useState(false);

    const handleMouseEnterCoursesDropdown = () => {
        setCoursesDropdownOpen(true);
    };

    const handleMouseLeaveCoursesDropdown = () => {
        setCoursesDropdownOpen(false);
    };

    return (
        <div
            className="relative ml-4 h-full"
            onMouseEnter={handleMouseEnterCoursesDropdown}
            onMouseLeave={handleMouseLeaveCoursesDropdown}
        >
            <button className="w-full h-full cursor-pointer hidden lg:block text-left">
                <FontAwesomeIcon
                    className="h-6 w-6 text-lime-500 cursor-pointer"
                    icon={["fas", "shopping-cart"]}
                />
            </button>
            {isCoursesDropdownOpen && (
                <div className="absolute right-0 transform translate-x-1/2 z-40 mt-0 w-64 h-auto bg-white border shadow-lg">
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
                                        onClick={
                                            handleMouseLeaveCoursesDropdown
                                        }
                                    >
                                        {course.title}
                                    </Link>
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
