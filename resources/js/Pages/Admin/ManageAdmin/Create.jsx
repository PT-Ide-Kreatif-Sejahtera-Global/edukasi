import ErrorDialog from "@/Components/ErrorDialog";
import FotoInput from "@/Components/FotoInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SuccessDialog from "@/Components/SuccessDialog";
import ReusableDialog from "@/Components/SuccessDialog";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import AdminLayout from "@/Layouts/AdminLayout";
import { Transition } from "@headlessui/react";
import { ArrowLeftIcon } from "@heroicons/react/20/solid";
import { Head, Link, useForm } from "@inertiajs/react";
import { useState } from "react";

export default function AdminCreate({}) {
    const { data, setData, post, errors, processing, recentlySuccessful } =
        useForm({
            name: "",
            email: "",
            password: "",
            foto: null,
        });

    const [open, setOpen] = useState(true);
    const handleImageChange = (e) => {
        const file = e.target.files[0];
        if (file) {
            setData("foto", file); // Store the file object directly
        } else {
            setData("foto", null); // Reset if no file is selected
        }
    };

    const submit = (e) => {
        e.preventDefault();

        post(route("submitadmin"), {
            preserveScroll: true,
            onSuccess: () => {
                <SuccessDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Berhasil"
                    message="Instruktur berhasil ditambahkan"
                    buttonText="Tutup"
                />;
                setData({
                    name: "",
                    email: "",
                    password: "",
                    foto: null,
                }); // Reset form data
            },
            onError: (error) => {
                <ErrorDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Error"
                    message="Instruktur Gagal Ditambahkan"
                    buttonText="Tutup"
                />;
                console.log(error);
            },
        });
    };

    return (
        <AdminLayout title="Tambah Instrukur">
            <Head title="Tambah Instruktur" />
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
                                    message={errors.password}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="Foto" value="Foto" />

                                <FotoInput
                                    imagePreview={
                                        data.foto
                                            ? URL.createObjectURL(data.foto)
                                            : null
                                    } // Create a preview URL if a file is selected
                                    onChange={handleImageChange} // Pass the handler function
                                    previewClassName="w-48 h-48 rounded-full"
                                />
                                <InputError
                                    message={errors.foto}
                                    className="mt-2"
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
