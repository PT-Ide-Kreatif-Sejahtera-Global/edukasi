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

export default function CreateCourseContent({
    courses,
    coursecategories,
    coursesections,
}) {
    const { data, setData, post, errors, processing, recentlySuccessful } =
        useForm({
            judul: "",
            kategori: "",
            section: "",
            title: "",
            url: "",
            durasi: null,
        });

    const [open, setOpen] = useState(true);

    const submit = (e) => {
        e.preventDefault();

        post(route("submitcontent"), {
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
                    judul: "",
                    kategori: "",
                    section: "",
                    title: "",
                    url: "",
                    durasi: null,
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
        <AdminLayout title="Tambah Instrukur">
            <Head title="Tambah Instruktur" />
            <div className="mt-4 mx-5 overflow-hidden rounded-lg bg-white shadow-md">
                <div className="my-4 px-4 sm:px-6 lg:px-8 bg-white">
                    <Link
                        href={route("content")}
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
                            <div>
                                <InputLabel
                                    htmlFor="judul"
                                    value="Pilih Kursus"
                                />
                                <select
                                    name="judul"
                                    id="judul"
                                    className={`mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-lime-500`}
                                    value={data.judul}
                                    onChange={(e) =>
                                        setData("judul", e.target.value)
                                    }
                                    required
                                >
                                    <option value="">Pilih Kursus</option>
                                    {courses.map((courses) => (
                                        <option
                                            key={courses.id}
                                            value={courses.id}
                                        >
                                            {courses.title}
                                        </option>
                                    ))}
                                </select>
                                <InputError
                                    message={errors.judul}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="judul"
                                    value="Pilih Kategori"
                                />
                                <select
                                    name="kategori"
                                    id="kategori"
                                    className={`mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-lime-500`}
                                    value={data.kategori}
                                    onChange={(e) =>
                                        setData("kategori", e.target.value)
                                    }
                                    required
                                >
                                    <option value="">Pilih Kategori</option>
                                    {coursecategories.map(
                                        (coursecategories) => (
                                            <option
                                                key={coursecategories.id}
                                                value={coursecategories.id}
                                            >
                                                {coursecategories.category_name}
                                            </option>
                                        )
                                    )}
                                </select>
                                <InputError
                                    message={errors.kategori}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="judul"
                                    value="Pilih Section"
                                />
                                <select
                                    name="section"
                                    id="section"
                                    className={`mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-lime-500`}
                                    value={data.section}
                                    onChange={(e) =>
                                        setData("section", e.target.value)
                                    }
                                    required
                                >
                                    <option value="">Pilih Section</option>
                                    {coursesections.map((coursesections) => (
                                        <option
                                            key={coursesections.id}
                                            value={coursesections.id}
                                        >
                                            {coursesections.section}
                                        </option>
                                    ))}
                                </select>
                                <InputError
                                    message={errors.section}
                                    className="mt-2"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    htmlFor="title"
                                    value="Judul Konten"
                                />

                                <TextInput
                                    id="title"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.title}
                                    onChange={(e) =>
                                        setData("title", e.target.value)
                                    }
                                    required
                                    autoComplete="username"
                                    placeholder="Masukkan judul konten"
                                />

                                <InputError
                                    className="mt-2"
                                    message={errors.title}
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="url" value="URL" />

                                <TextInput
                                    id="url"
                                    type="text"
                                    className="mt-1 block w-full"
                                    value={data.url}
                                    onChange={(e) =>
                                        setData("url", e.target.value)
                                    }
                                    required
                                    placeholder="Masukkan URL konten"
                                    autoComplete="username"
                                />

                                <InputError
                                    className="mt-2"
                                    message={errors.url}
                                />
                            </div>

                            <div>
                                <InputLabel htmlFor="durasi" value="Durasi" />

                                <TextInput
                                    id="durasi"
                                    type="number"
                                    className="mt-1 block w-full"
                                    value={data.durasi}
                                    onChange={(e) =>
                                        setData("durasi", e.target.value)
                                    }
                                    required
                                    placeholder="Masukkan Durasi Konten dalam menit"
                                    autoComplete="username"
                                />

                                <InputError
                                    className="mt-2"
                                    message={errors.durasi}
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
