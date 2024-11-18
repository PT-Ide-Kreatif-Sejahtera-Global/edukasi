import { useEffect, useState } from "react";
import Checkbox from "@/Components/Checkbox";
import GuestLayout from "@/Layouts/GuestLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, Link, useForm } from "@inertiajs/react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faEye, faEyeSlash } from "@fortawesome/free-solid-svg-icons";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route("login"));
    };

    const [showPassword, setShowPassword] = useState(false);

    return (
        <>
            <Head title="Log in" />

            <div className="flex min-h-screen flex-1">
                {/* Left Side - Image */}
                <div className="relative hidden lg:block w-1/2">
                    <img
                        alt="Background"
                        src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                        className="absolute inset-0 w-full h-full object-cover"
                    />
                </div>

                {/* Right Side - Login Form */}
                <div className="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:px-20 xl:px-24 w-full lg:w-1/2">
                    <div className="mx-auto w-full max-w-sm lg:w-96">
                        <div>
                            <img
                                alt="Your Company"
                                src="/admin/images/logos/IdeaThings.png"
                                className="h-16 w-auto"
                            />
                            <h2 className="mt-8 text-2xl font-bold tracking-tight text-gray-900">
                                Sign in to your account
                            </h2>
                            <p className="mt-2 text-sm text-gray-500">
                                Not a member?{" "}
                                <Link
                                    href="/register"
                                    className="text-sm font-bold text-lime-500"
                                >
                                    Register
                                </Link>
                            </p>
                        </div>

                        <div className="mt-10">
                            <div className="bg-white rounded-lg shadow-md p-6 space-y-6">
                                <form
                                    action="#"
                                    method="POST"
                                    className="space-y-6"
                                    onSubmit={submit}
                                >
                                    <div>
                                        <label
                                            htmlFor="email"
                                            className="block text-sm font-medium text-gray-900"
                                        >
                                            Email address
                                        </label>
                                        <div className="mt-2">
                                            <input
                                                id="email"
                                                name="email"
                                                type="email"
                                                required
                                                autoComplete="email"
                                                className="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            htmlFor="password"
                                            className="block text-sm font-medium text-gray-900"
                                        >
                                            Password
                                        </label>
                                        <div className="mt-2 relative">
                                            <input
                                                id="password"
                                                name="password"
                                                type={
                                                    showPassword
                                                        ? "text"
                                                        : "password"
                                                }
                                                required
                                                autoComplete="new-password"
                                                value={data.password}
                                                onChange={(e) =>
                                                    setData(
                                                        "password",
                                                        e.target.value
                                                    )
                                                }
                                                className="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm"
                                            />
                                            <span
                                                className="absolute right-2 top-1/2 transform -translate-y-1/2 cursor-pointer"
                                                onClick={() =>
                                                    setShowPassword(
                                                        !showPassword
                                                    )
                                                }
                                            >
                                                {showPassword ? (
                                                    <FontAwesomeIcon
                                                        icon={faEyeSlash}
                                                        className="text-lime-400"
                                                    />
                                                ) : (
                                                    <FontAwesomeIcon
                                                        icon={faEye}
                                                        className="text-lime-400"
                                                    />
                                                )}
                                            </span>
                                            {errors.password && (
                                                <div className="text-red-600 mt-1">
                                                    {errors.password}
                                                </div>
                                            )}
                                        </div>
                                    </div>

                                    <div className="flex items-center justify-between">
                                        <div className="flex items-center">
                                            <input
                                                id="remember-me"
                                                name="remember-me"
                                                type="checkbox"
                                                className="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600"
                                            />
                                            <label
                                                htmlFor="remember-me"
                                                className="ml-3 block text-sm text-gray-700"
                                            >
                                                Remember me
                                            </label>
                                        </div>

                                        <div className="text-sm">
                                            <a
                                                href="#"
                                                className="font-semibold text-lime-600 hover:text-lime-500"
                                            >
                                                Forgot password?
                                            </a>
                                        </div>
                                    </div>

                                    <div>
                                        <button
                                            type="submit"
                                            className="flex w-full justify-center rounded-md bg-lime-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600"
                                        >
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
