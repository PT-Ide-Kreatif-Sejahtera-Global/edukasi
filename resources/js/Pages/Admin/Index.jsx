import AdminLayout from "@/Layouts/AdminLayout";

export default function Index({ auth }) {
    return (
        <AdminLayout auth={auth}>
            <div className="flex flex-col items-center justify-center gap-4 py-20">
                <h1 className="text-4xl font-bold">Admin Dashboard</h1>
                <p className="text-lg">
                    Welcome to the admin dashboard, where you can manage your
                    courses, users, and more.
                </p>
            </div>
        </AdminLayout>
    );
}
