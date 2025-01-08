import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

export default function SearchBar() {
    return (
        <div className="relative sm:w-60 md:w-96 lg:w-[500px] hidden sm:block px-3 py-2">
            <span className="absolute inset-y-0 left-0 flex items-center pl-3">
                <FontAwesomeIcon
                    icon={["fas", "search"]}
                    className="px-4 text-gray-400"
                />
            </span>
            <input
                type="text"
                className="block w-full pl-10 rounded-full border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                placeholder="Cari Kursus Anda Disini"
            />
        </div>
    );
}
