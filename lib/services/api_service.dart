import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiService {
  static const String baseUrl = "http://localhost/Homeless_media/API/MOBILE";

  // LOGIN

  static Future login(String username, String password) async {
    var response = await http.post(
      Uri.parse("$baseUrl/login.php"),

      body: {"username": username, "password": password},
    );
    print(response.body);
    return jsonDecode(response.body);
  }

  // AKUN TERBARU

  static Future getAkunTerbaru() async {
    var response = await http.get(Uri.parse("$baseUrl/akun_terbaru.php"));

    return jsonDecode(response.body);
  }

  // BERITA TERBARU

  static Future getBeritaTerbaru() async {
    var response = await http.get(Uri.parse("$baseUrl/berita_terbaru.php"));

    return jsonDecode(response.body);
  }
}
