function handleLogin(event) {
	event.preventDefault(); // Mencegah form dikirim secara default saat tombol diklik

	// Ambil nilai dari inputan username dan password
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	// Validasi panjang username minimal 5 karakter
	if (username.length >= 5) {
		// Validasi panjang password minimal 8 karakter
		if (password.length >= 8) {
			var loginForm = document.getElementById("loginForm");
			loginForm.submit(); // Jika valid, submit form secara manual
		} else {
			alert("Maaf, password minimal harus 8 karakter."); // Notifikasi jika password kurang
		}
	} else {
		alert("Maaf, username minimal harus 5 karakter."); // Notifikasi jika username kurang
	}
}

// Event listener pada tombol login, akan memicu fungsi handleLogin saat diklik
document.getElementById("loginButton").addEventListener("click", handleLogin);
