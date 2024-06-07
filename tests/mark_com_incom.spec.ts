import { test, expect } from '@playwright/test';

const task = "Laundry";
const des = "Wash all the clothes";

const user = {
    name: "chanleang1",
    email: "chanleang1@gmail.com",
    password: "12345678"
};


async function login(page, url, email, password) {
    await page.goto(url);
    await page.getByRole('link', { name: 'Login' }).click();
    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(email);
    await page.getByRole('textbox', { name: 'Password' }).fill(password);
    await page.getByRole('button', { name: 'Login' }).click();
    await expect(page.getByText('You are logged in!')).toBeVisible();
}

test("Set Task Successful", async ({page}) => {
    await login(page, 'http://127.0.0.1:8000/', user.email, user.password);

    await expect(page.getByText("You are logged in!")).toBeVisible();

    await page.getByRole("button", {name: "Task"}).click();
    await page.getByRole("link", {name: "Tasks Overview"}).click();
    
    const row = await page.locator('tr', {hasText: task});

    if(row){
        await row.locator(".fa-pencil").first().click();
    }else{
        const row2 = await page.locator('tr', {hasText: task + ' ' + "_Updated"});
        await row2.locator(".fa-pencil").first().click();
    }


    // await page.getByRole("checkbox", {name: "Status Complete"}).click();
    const check  = await page.getByRole("checkbox", {name: "Status Complete"}).isChecked();

    if(!check){
        await page.getByRole("checkbox", {name: "Status Complete"}).click();
    }

    await page.getByRole("button", {name: "Save"}).click();

    await expect(page.getByText("Task Updated", {exact: true})).toBeVisible();
})

test("Set Task Uncompleted", async ({page}) => {
    await login(page, 'http://127.0.0.1:8000/', user.email, user.password);

    await expect(page.getByText("You are logged in!")).toBeVisible();

    await page.getByRole("button", {name: "Task"}).click();
    await page.getByRole("link", {name: "Tasks Overview"}).click();
    
    const row = await page.locator('tr', {hasText: task});

    if(row){
        await row.locator(".fa-pencil").first().click();
    }else{
        const row2 = await page.locator('tr', {hasText: task + ' ' + "_Updated"});
        await row2.locator(".fa-pencil").first().click();
    }


    // await page.getByRole("checkbox", {name: "Status Complete"}).click();
    const check  = await page.getByRole("checkbox", {name: "Status Complete"}).isChecked();

    if(check){
        await page.getByRole("checkbox", {name: "Status Complete"}).click();
    }

    await page.getByRole("button", {name: "Save"}).click();

    await expect(page.getByText("Task Updated", {exact: true})).toBeVisible();
})