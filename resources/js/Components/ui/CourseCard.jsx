export default function CourseCard({ title, price, image }) {
    return (
        <div className="bg-white shadow-md rounded-lg overflow-hidden w-64">
            <img src={image} alt={title} className="w-full h-48 object-cover" />
            <div className="p-5">
                <span className="font-bold text-lg transition-all duration-300 line-clamp-2 hover:line-clamp-3">
                    {title}
                </span>
                <p className="text-lime-500 text-md font-semibold mt-2">
                    Rp {price}
                </p>
                {/* <div className="flex items-center mt-2">
                    <div className="flex items-center text-yellow-500">
                        {"⭐".repeat(5)} 
                    </div>
                    <span className="ml-2 text-md text-gray-600">
                        ({totalRating})
                    </span>
                </div> */}
            </div>
        </div>
    );
}
