const CourseCard = ({ title, price, totalRating, image }) => {
    return (
        <div className="bg-white shadow-md rounded-lg overflow-auto w-62">
            <img src={image} alt={title} className="w-full h-48 object-cover" />
            <div className="p-5">
                <span className="block font-bold overflow-hidden whitespace-nowrap overflow-ellipsis transition-all duration-300 hover:text-wrap">
                    {title}
                </span>
                <p className="text-blue-600 font-semibold">{price}</p>
                <div className="flex items-center mt-2">
                    <div className="flex w-4 h-4 items-center text-yellow-500">
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
