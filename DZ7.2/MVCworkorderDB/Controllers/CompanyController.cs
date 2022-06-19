using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MVCworkorderDB.Models;

namespace MVCworkorderDB.Controllers
{
    public class CompanyController : Controller
    {
        private Model2 db = new Model2();

        // GET: Company
        public ActionResult Index()
        {
            var company = db.company.Include(m => m.managers).Include(m => m.locations);
            return View(company.ToList());
        }

        // GET: Company/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            company company = db.company.Find(id);
            if (company == null)
            {
                return HttpNotFound();
            }
            return View(company);
        }

        // GET: Company/Create
        public ActionResult Create()
        {
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name");
            ViewBag.location_id = new SelectList(db.locations, "id", "name");
            return View();
        }

        // POST: Company/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "id,manager_roll_num,location_id,company1")] company company)
        {
            if (ModelState.IsValid)
            {
                db.company.Add(company);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", company.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", company.location_id);
            return View(company);
        }

        // GET: Company/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            company company = db.company.Find(id);
            if (company == null)
            {
                return HttpNotFound();
            }
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", company.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", company.location_id);
            return View(company);
        }

        // POST: Company/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "id,manager_roll_num,location_id,company1")] company company)
        {
            if (ModelState.IsValid)
            {
                db.Entry(company).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.manager_roll_num = new SelectList(db.managers, "roll_num", "first_name", company.manager_roll_num);
            ViewBag.location_id = new SelectList(db.locations, "id", "name", company.location_id);
            return View(company);
        }

        // GET: Company/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            company company = db.company.Find(id);
            if (company == null)
            {
                return HttpNotFound();
            }
            return View(company);
        }

        // POST: Company/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            company company = db.company.Find(id);
            db.company.Remove(company);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
