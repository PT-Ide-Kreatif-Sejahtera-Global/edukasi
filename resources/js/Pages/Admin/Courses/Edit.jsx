import ErrorDialog from "@/Components/ErrorDialog";
import FotoInput from "@/Components/FotoInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SuccessDialog from "@/Components/SuccessDialog";
import TextArea from "@/Components/TextArea";
import TextInput from "@/Components/TextInput";
import AdminLayout from "@/Layouts/AdminLayout";
import { Transition } from "@headlessui/react";
import { ArrowLeftIcon } from "@heroicons/react/20/solid";
import { Head, Link, useForm } from "@inertiajs/react";
import { useState } from "react";

export default function EditCourse({ course, instructors }) {
    const { data, setData, put, errors, processing, recentlySuccessful } =
        useForm({
            title: course.title || "",
            description: course.description || "",
            price: course.price || "",
            total_price: course.total_price || "",
            is_locked: course.is_locked || "1", // Default to locked
            instructor_id: course.instructor_id || "",
            foto: null,
        });

    const [open, setOpen] = useState(true);
    const handleImageChange = (e) => {
        const file = e.target.files[0];
        setData("foto", file ? file : null); // Store the file object directly or reset
    };

    const submit = (e) => {
        e.preventDefault(); // Prevent default form submission

        console.log("Form Data:", data); // Debugging line to check form data

        put(route("updatecourse", course.id), {
            preserveScroll: true,
            onSuccess: () => {
                <SuccessDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Berhasil"
                    message="Kursus berhasil ditambahkan"
                    buttonText="Tutup"
                />;
                setData({
                    title: "",
                    description: "",
                    price: "",
                    total_price: "",
                    is_locked: "1", // Default to locked
                    instructor_id: "",
                    foto: null,
                }); // Reset form data
            },
            onError: () => {
                <ErrorDialog
                    isOpen={open}
                    onClose={() => setOpen(false)}
                    title="Error"
                    message="Instruktur Gagal Ditambahkan"
                    buttonText="Tutup"
                />;
            },
        });
    };

    return (
        <AdminLayout title="Edit Kursus">
            <Head title="Edit Kursus" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="my-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <Link
                        href={route("course")}
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
                                <InputLabel htmlFor="title" value="Judul" />
                                <TextInput
                                    id="title"
                                    className="mt-1 block w-full"
                                    value={data.title}
                                    onChange={(e) =>
                                        setData("title", e.target.value)
                                    }
                                    required
                                    isFocused
                                    autoComplete="title"
                                />
                                <InputError
                                    className="mt-2"
                                    message={errors.title}
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel
                                    htmlFor="description"
                                    value="Deskripsi"
                                />
                                <TextArea
                                    id="description"
                                    value={data.description}
                                    onChange={(e) =>
                                        setData("description", e.target.value)
                                    }
                                    className="mt-1 block w-full"
                                    required
                                />
                                <InputError
                                    message={errors.description}
                                    className="mt-2"
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel htmlFor="price" value="Harga" />
                                <TextInput
                                    id="price"
                                    type="number"
                                    className="mt-1 block w-full"
                                    value={data.price}
                                    onChange={(e) =>
                                        setData("price", e.target.value)
                                    }
                                    required
                                />
                                <InputError
                                    message={errors.price}
                                    className="mt-2"
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel
                                    htmlFor="total_price"
                                    value="Total Harga"
                                />
                                <TextInput
                                    id="total_price"
                                    type="number"
                                    className="mt-1 block w-full"
                                    value={data.total_price}
                                    onChange={(e) =>
                                        setData("total_price", e.target.value)
                                    }
                                    required
                                />
                                <InputError
                                    message={errors.total_price}
                                    className="mt-2"
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel
                                    htmlFor="is_locked"
                                    value="Status Kunci"
                                />
                                <select
                                    id="is_locked"
                                    value={data.is_locked}
                                    onChange={(e) =>
                                        setData("is_locked", e.target.value)
                                    }
                                    className="mt-1 block w-full border-gray-300 rounded-md focus:border-lime-500 focus:ring-lime-500"
                                >
                                    <option value="1">Locked</option>
                                    <option value="2">Unlocked</option>
                                </select>
                                <InputError
                                    message={errors.is_locked}
                                    className="mt-2"
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel
                                    htmlFor="instructor_id"
                                    value="Pilih Instruktur"
                                />
                                <select
                                    name="instructor_id"
                                    id="instructor_id"
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-lime-500"
                                    value={data.instructor_id}
                                    onChange={(e) =>
                                        setData("instructor_id", e.target.value)
                                    }
                                    required
                                >
                                    <option value="">Pilih Instruktur</option>
                                    {instructors.map((instructor) => (
                                        <option
                                            key={instructor.id}
                                            value={instructor.id}
                                        >
                                            {instructor.instructor_name}
                                        </option>
                                    ))}
                                </select>
                                <InputError
                                    message={errors.instructor_id}
                                    className="mt-2"
                                />
                            </div>

                            <div className="mb-4">
                                <InputLabel htmlFor="foto" value="Foto" />
                                <FotoInput
                                    imagePreview={
                                        data.foto
                                            ? URL.createObjectURL(data.foto)
                                            : course.foto
                                            ? `/storage/course/${course.foto}` // Load existing image from storage
                                            : null
                                    }
                                    onChange={handleImageChange}
                                />
                                <InputError
                                    message={errors.foto}
                                    className="mt-2"
                                />
                            </div>

                            <div className="flex items-center gap-4">
                                <PrimaryButton
                                    className="mb-4"
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
