import Star from "./Star"; // Assuming the Star component is in the same directory

const CourseCard = ({ title, description, rating, imageUrl }) => {
    return (
        <div className="bg-white shadow-lg rounded-lg overflow-hidden max-w-xs">
            <img
                src={imageUrl}
                alt={title}
                className="w-full h-40 object-cover"
            />
            <div className="p-4">
                <h3 className="text-lg font-bold">{title}</h3>
                <p className="text-gray-600 mt-2">{description}</p>
                <Star rating={rating} /> {/* Display the star rating */}
            </div>
        </div>
    );
};

export default CourseCard;
