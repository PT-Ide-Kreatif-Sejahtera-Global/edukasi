import { Link } from "@inertiajs/react";

export default function AuthButtons() {
    return (
        <div className="ml-4 space-x-4">
            <Link
                href="/register"
                className="bg-white hover:bg-lime-400 ring-lime-300 text-lime-400 hover:text-white ring-1 ring-inset font-bold py-2 px-4 rounded"
            >
                Sign Up
            </Link>
            <Link
                href="/login"
                className="bg-lime-500 hover:bg-lime-600 text-white font-bold py-2 px-4 rounded"
            >
                Sign In
            </Link>
        </div>
    );
}
