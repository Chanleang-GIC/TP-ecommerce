import { test, expect } from '@playwright/test';

const user = {
    name: "chanleang1",
    email: "chanleang1@gmail.com",
    password: "12345678"
};

const task = {
    name: "Laundry",
    description: "Wash all the clothes",
    updatedName: "Laundry_Updated",
    updatedDescription: "Wash all the clothes_Updated"
};

async function login(page, url, email, password) {
    await page.goto(url);
    await page.getByRole('link', { name: 'Login' }).click();
    await page.getByRole('textbox', { name: 'E-Mail Address' }).fill(email);
    await page.getByRole('textbox', { name: 'Password' }).fill(password);
    await page.getByRole('button', { name: 'Login' }).click();
    await expect(page.getByText('You are logged in!')).toBeVisible();
}

async function createTask(page, taskName, taskDescription) {
    await page.getByRole("button", { name: "Tasks" }).click();
    await page.getByRole('link', { name: "Create Task" }).click();
    await page.getByRole('textbox', { name: "Task Name" }).fill(taskName);
    await page.getByRole('textbox', { name: "Description" }).fill(taskDescription);
    await page.getByRole('button', { name: "Create Task" }).click();
    await expect(page.getByText("Task created", { exact: true })).toBeVisible();
}

test('Create new task', async ({ page }) => {
    await login(page, 'http://127.0.0.1:8000/', user.email, user.password);
    await createTask(page, task.name, task.description);
});

// CRUD002
test("Update Task", async ({ page }) => {
    await login(page, 'http://127.0.0.1:8000/', user.email, user.password);
    await page.getByRole("button", { name: "Task" }).click();
    await page.getByRole("link", { name: "Tasks Overview" }).click();
    
    const row = await page.locator('tr', { hasText: task.name });
    await row.locator(".fa-pencil").first().click();

    await page.getByRole("textbox", { name: "Task Name" }).fill(task.updatedName);
    await page.getByRole("textbox", { name: "Task Description" }).fill(task.updatedDescription);
    await page.getByRole("button", { name: "Save Changes" }).click();

    await expect(page.getByText("Task Updated", { exact: true })).toBeVisible();
});

// CRUD003
test("Delete Task", async ({ page }) => {
    await login(page, 'http://127.0.0.1:8000/', user.email, user.password);
    await page.getByRole("button", { name: "Task" }).click();
    await page.getByRole("link", { name: "Tasks Overview" }).click();
    
    const row1 = await page.locator('tr', { hasText: task.updatedName });
    await row1.locator(".fa-pencil").first().click();
    await page.locator(".fa-trash").first().click();

    await expect(page.getByText("Task Deleted", { exact: true })).toBeVisible();
});
