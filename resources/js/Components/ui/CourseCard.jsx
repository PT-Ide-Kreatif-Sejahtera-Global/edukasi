// CourseCard.js
import React from "react";

const CourseCard = ({ title, price, totalRating, imageUrl }) => {
    return (
        <div className="bg-white shadow-xl rounded-lg p-4 max-w-xs mx-auto text-gray-700">
            <div className="relative">
                <img
                    src={imageUrl}
                    alt="Course Thumbnail"
                    className="w-full h-40 object-cover rounded-t-lg"
                />
            </div>
            <div className="pt-6">
                <h3 className="font-bold text-lg text-gray-800 truncate">
                    {title}
                </h3>
                <p className="text-blue-600 font-semibold">{price}</p>
                <div className="flex items-center mt-2">
                    <div className="flex items-center text-yellow-500">
                        {"⭐".repeat(5)}
                        {/* Full Stars */}
                    </div>
                    <span className="ml-2 text-sm text-gray-600">
                        {totalRating}
                    </span>
                </div>
            </div>
        </div>
    );
};

export default CourseCard;
