import json
import requests
import logging
import httpx
from bs4 import BeautifulSoup
import asyncio
from httpx import AsyncClient
from rich import print
from rich.logging import RichHandler
from rich.syntax import Syntax
from rich.console import Console


payload = {
    "identifier": "admin",
    "password": "admin"
}

login_url = "http://localhost/modules/login/login.php"
success_login_url = "http://localhost/index.php"
target_url = "http://localhost/modules/account/add_product.php"

FORMAT = "%(message)s"
logging.basicConfig(
    level="INFO", format=FORMAT, datefmt="[%X]", handlers=[RichHandler()]
)
logger = logging.getLogger(__name__)

with requests.session() as s:
    login_response = s.post(login_url, data=payload)
    if login_response.status_code != 200 or login_response.url != success_login_url:
        logger.critical("Failed to login")
        exit()

    target_response = s.get(target_url)
    soup = BeautifulSoup(target_response.content, "html.parser")
    syntax = Syntax(soup.prettify(), "html", line_numbers=True)
    Console().print(syntax)

with open("./sports_equipment.json", "r", encoding="utf-8") as f:
    data = json.load(f)

async def send_product(client: AsyncClient, product: dict) -> None:
    response = await client.post(target_url, data=product)
    if response.status_code != 200:
        logger.critical("Failed to add product: %s", product["title"])

async def main() -> None:
    async with httpx.AsyncClient() as client:
        async with asyncio.TaskGroup() as tg:
            for product in data:
                tg.create_task(send_product(client, product))

if __name__ == "__main__":
    asyncio.run(main())
    print(data)