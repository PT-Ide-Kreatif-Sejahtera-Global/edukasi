import ErrorDialog from "@/Components/ErrorDialog";
import FotoInput from "@/Components/FotoInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import AdminLayout from "@/Layouts/AdminLayout";
import { Transition } from "@headlessui/react";
import { ArrowLeftIcon } from "@heroicons/react/20/solid";
import { Head, Link, useForm } from "@inertiajs/react";

export default function InstructorEdit({ user }) {
    const { data, setData, put, errors, processing, recentlySuccessful } =
        useForm({
            name: user.name || "",
            email: user.email || "",
            password: "",
            foto: null, // Initialize foto as null
            bio: user.bio || "",
        });

    const handleImageChange = (e) => {
        const file = e.target.files[0];
        setData("foto", file ? file : null); // Store the file object directly or reset
    };

    const submit = (e) => {
        e.preventDefault();

        put(route("updateinstructor", user.id), {
            preserveScroll: true,
            onSuccess: () => {
                // Reset form data after successful submission
                setData({
                    name: user.name || "",
                    email: user.email || "",
                    password: "",
                    foto: null,
                    bio: user.bio || "",
                });
            },
            onError: () => {
                // Handle error case if needed
            },
        });
    };

    return (
        <AdminLayout title="Edit Instruktur">
            <Head title="Edit Instruktur" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="my-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <Link
                        href={route("instructor")}
                        className="flex items-center text-lime-500 hover:text-lime-700"
                    >
                        <ArrowLeftIcon className="h-5 w-5 mr-2" />
                        <p>Kembali</p>
                    </Link>
                    <div className="overflow-y-scroll mt-6 mb-12 px-2 max-h-[360px]">
                        <form
                            onSubmit={submit}
                            encType="multipart/form-data"
                            className="space-y-6"
                        >
                            <div className="mb-4">
                                <InputLabel htmlFor="name" value="Nama" />
                                <TextInput
                                    id="name"
                                    className="mt-1 block w-full"
                                    value={data.name}
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                    required
                                    isFocused
                                    autoComplete="name"
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.name}
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="email" value="Email" />
                                <TextInput
                                    id="email"
                                    type="email"
                                    className="mt-1 block w-full"
                                    value={data.email}
                                    onChange={(e) =>
                                        setData("email", e.target.value)
                                    }
                                    required
                                    autoComplete="username"
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.email}
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="password"
                                    value="Password"
                                />
                                <TextInput
                                    id="password"
                                    value={data.password}
                                    onChange={(e) =>
                                        setData("password", e.target.value)
                                    }
                                    type="password"
                                    className="mt-1 block w-full"
                                    autoComplete="new-password"
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.password}
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="bio" value="Bio" />
                                <TextArea
                                    id="bio"
                                    value={data.bio}
                                    onChange={(e) =>
                                        setData("bio", e.target.value)
                                    }
                                    className="mt-1 block w-full"
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.bio}
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="foto" value="Foto" />
                                <FotoInput
                                    imagePreview={
                                        data.foto
                                            ? URL.createObjectURL(data.foto)
                                            : user.foto
                                            ? `/storage/users/${user.foto}` // Load existing image from storage
                                            : null
                                    }
                                    onChange={handleImageChange}
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.foto}
                                />
                            </div>

                            <div className="flex items-center gap-4">
                                <PrimaryButton
                                    className="mb-4 text-balance text-center"
                                    disabled={processing}
                                >
                                    Simpan
                                </PrimaryButton>

                                <Transition
                                    show={recentlySuccessful}
                                    enter="transition ease-in-out"
                                    enterFrom="opacity-0"
                                    leave="transition ease-in-out"
                                    leaveTo="opacity-0"
                                >
                                    <p className="text-sm text-gray-600">
                                        Tersimpan
                                    </p>
                                </Transition>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AdminLayout>
    );
}
