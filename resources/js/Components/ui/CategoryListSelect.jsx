// CategoryList.js
import React from "react";

const categories = [
    { id: 1, name: "All Courses" },
    { id: 2, name: "Programming" },
    { id: 3, name: "Design" },
    { id: 4, name: "Marketing" },
];

const CategoryList = ({ selectedCategory, onSelectCategory }) => {
    return (
        <div className="mb-6 flex justify-center space-x-4">
            {categories.map((category) => (
                <button
                    key={category.id}
                    className={`px-4 py-2 font-semibold rounded-lg 
                                ${
                                    selectedCategory === category.id
                                        ? "bg-lime-500 text-white"
                                        : "bg-gray-100 text-lime-300 hover:bg-lime-500 hover:text-white"
                                }`}
                    onClick={() => onSelectCategory(category.id)}
                >
                    {category.name}
                </button>
            ))}
        </div>
    );
};

export default CategoryList;
