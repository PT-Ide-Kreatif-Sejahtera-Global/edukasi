// Star.js
import React from "react";

const Star = ({ rating }) => {
    // Function to render stars based on the rating value
    const renderStars = (rating) => {
        const fullStars = Math.floor(rating);
        const halfStar = rating % 1 >= 0.5 ? 1 : 0;
        const emptyStars = 5 - fullStars - halfStar;

        return (
            <span className="text-yellow-500">
                {"⭐".repeat(fullStars)} {/* Filled stars */}
                {halfStar ? "⭐" : ""} {/* Half star */}
                {"☆".repeat(emptyStars)} {/* Empty stars */}
            </span>
        );
    };

    return <div className="flex items-center mb-4">{renderStars(rating)}</div>;
};

export default Star;
